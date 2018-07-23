import React, { Component } from 'react';
import ReactDOM from 'react-dom';


export default class ResultPodium extends Component {
    constructor() {
      super();
      // Don't call this.setState() here!
      this.state = {
        tmpTimeStart: window.regate.heure_dep,
        tmpTimeEnd : window.regate.heure_arr,
        podiumBoats : window.podiumBoats,
        boats : window.boats
      };
    }

    sortPodium(boat1, boat2) {
      if (boat1.totalSeconds < boat2.totalSeconds)
       return -1;
      if (boat1.totalSeconds > boat2.totalSeconds)
       return 1;
      return 0;
    }


     changePodium(boat) {
      let boats = this.state.boats.slice();
      let podiumBoats = this.state.podiumBoats.slice();

      for (var i = 0; i < boats.length; i++) {
        if (boats[i].bateau_id === boat.bateau_id) {
          boats.splice(i, 1);
          this.setState({
            boats: boats
          })
          break;
        }
      }

      podiumBoats.push(boat);
      podiumBoats.sort(this.sortPodium);

      this.setState({
        podiumBoats: podiumBoats
      })

      this.forceUpdate();
      return;
    }

    setArrival(boat) {
      let video = document.getElementById("video");
      let raceStart = moment(this.state.tmpTimeStart);
      let raceEnd = moment(this.state.tmpTimeEnd);

      let tmpSeconds = raceEnd.diff(raceStart, 'seconds');

      let currentVideotime = video.currentTime;
      let totalSeconds = boat.coefficient ? (tmpSeconds + currentVideotime) * boat.coefficient : (tmpSeconds + currentVideotime);
      let finalTime = moment.utc(totalSeconds*1000).format('HH:mm:ss');

      $.ajax({
        type: "POST",
        url: '/admin/boat/setTime/'+boat.bateau_id,
        data: {
         timeSeconds: totalSeconds
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
          console.log("End Hour added");
        },
        error: function(e) {
          console.log(e);
        }
      });
      boat.temps = finalTime;
      boat.totalSeconds = totalSeconds;
      this.changePodium(boat);

    }

    removeBoat(boat) {
      let boats = this.state.boats.slice();
      let podiumBoats = this.state.podiumBoats.slice();

      $.ajax({
        type: "GET",
        url: '/admin/boat/resetTime/'+boat.bateau_id,
        data: {},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
          console.log("Time reset");
        },
        error: function(e) {
          console.error(e);
        }
      });

      for (var i = 0; i < podiumBoats.length; i++) {
        if (podiumBoats[i].bateau_id === boat.bateau_id) {
          boat.temps = null;
          podiumBoats.splice(i, 1);
          this.setState({
            podiumBoats: podiumBoats
          })
          break;
        }
      }

      boats.push(boat);
      this.setState({
        boats: boats
      })

      // this.forceUpdate();
      return;
    }



    createBoatTable(type) {
      let boats = this.state.boats;
      let table = [];

      // Outer loop to create parent
      for (let i = 0; i < boats.length; i++) {
        if (!boats[i].temps) {
          let children = [];
          children.push(<td key={boats[i].bateau_id}>{boats[i].nom}</td>);
          children.push(<td>
            <button type="button" name="button" className="set-arrival-btn btn btn-success"
              onClick={this.setArrival.bind(this, boats[i])}>Arrivé</button>
          </td>);

          table.push(<tr>{children}</tr>);
        }
      }

      return table;
    }

    createPodiumTable() {
      let boats = this.state.podiumBoats;
      let table = [];

      // Outer loop to create parent
      for (let i = 0; i < boats.length; i++) {
        let children = []
        children.push(<td key={boats[i].bateau_id}>{boats[i].nom}</td>);
        children.push(<td>{boats[i].temps}</td>);

        children.push(<td>
          <div type="button" name="button"
            onClick={this.removeBoat.bind(this, boats[i])}><i className="fas fa-times"></i>
          </div>
        </td>);


        table.push(<tr>{children}</tr>);

      }

      return table;
    }


    render() {


      return (
          <div className="container-fluid">
              <div className="row">
                  <div className="col-md-6">
                      <div className="panel panel-default">
                          <div className="panel-heading">Liste des Bateaux :</div>
                          <div className="panel-body">
                              <table className="podium-table">
                                <thead>
                                  <tr>
                                    <th className="text-center">Bateau</th>
                                  </tr>
                                </thead>
                                <tbody className="podium-body">
                                  {this.createBoatTable()}
                                </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div className="col-md-6">
                      <div className="panel panel-default">
                          <div className="panel-heading">Podium :
                            <a href="/admin/excel"><i className="far fa-file-pdf"></i> </a>
                          </div>
                          <div className="panel-body">
                            <div className="panel-body">
                                <table className="podium-table">
                                  <thead>
                                    <tr>
                                      <th className="text-center">Bateau</th>
                                    </tr>
                                  </thead>
                                  <tbody className="podium-body">
                                    {this.createPodiumTable()}
                                  </tbody>
                                </table>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      );
    }
}

if (document.getElementById('podium')) {
  ReactDOM.render(<ResultPodium />, document.getElementById('podium'));
}
