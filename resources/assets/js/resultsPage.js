// function init() {
//   document._video = document.getElementById("video");
//
//   // var oA = document.getElementById('test');
//   // var heur = document.getElementById('heure');
//   // var addi = document.getElementById('addition');
//   // var position = 1;
//   // function setPodium(finalTime, btnClass) {
//   //   var boatName = $(btnClass).find('input:nth-child(2)').val();
//   //
//   //   $('.podium-body')
//   //     .append(`<tr>
//   //         <td>`+boatName+`</td>
//   //         <td>`+finalTime+`</td>
//   //         <td>`+position+`</td>
//   //       `);
//   //   position++;
//   // }
//
//   // $('.set-arrival-btn').click(function(e) {
//   //
//   //   var tmpSeconds = tmpTimeEnd.diff(tmpTimeStart, 'seconds');
//   //   var currentVideotime = document._video.currentTime;
//   //   var totalSeconds = tmpSeconds + currentVideotime;
//   //   var finalTime = moment.utc(totalSeconds*1000).format('HH:mm:ss');
//   //   // console.log(typeof finalTime);
//   //
//   //   var boatId = $(this).find('input:first').val();
//   //   $.ajax({
//   //       type: "POST",
//   //       url: '/admin/boat/setTime/'+boatId,
//   //       data: {
//   //        timeSeconds: totalSeconds
//   //       },
//   //       headers: {
//   //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   //       },
//   //       success: function() {
//   //         console.log("End Hour added");
//   //       },
//   //       error: function(e) {
//   //         console.log(e);
//   //       }
//   //     });
//   //     $(this).parent().parent().addClass('hidden');
//       // setPodium(finalTime, this);
//
//     // console.log(moment.utc(totalSeconds*1000).format('HH:mm:ss'));
//   });
//   // oA.onclick = function() {
//   //   document._video = document.getElementById("video");
//   //   var curtime = document._video.currentTime;
//   //   alert(curtime);
//   // };
//   // heur.onclick = function() {
//   //   var ladate = new Date();
//   //   alert(ladate.getHours() + ":" + ladate.getMinutes() + ":" + ladate.getSeconds());
//   // };
//   // addi.onclick = function() {
//   //   document._video = document.getElementById("video");
//   //   var curtime = document._video.currentTime;
//   //   // heure d'arrivée convertie en secondes
//   //   var heure_arr = new Date();
//   //   var heure_arrSec = heure_arr.getSeconds();
//   //   var heure_arrMin = heure_arr.getMinutes() * 60;
//   //   var heure_arrHeures = heure_arr.getHours() * 3600;
//   //   var heure_arrSecTotales = heure_arrMin + heure_arrHeures + heure_arrSec;
//   //   // heure de depart convertie en secondes
//   //   var heure_dep = new Date();
//   //   var heure_depSec = heure_dep.getSeconds();
//   //   var heure_depMin = heure_dep.getMinutes() * 60;
//   //   var heure_depHeures = heure_dep.getHours() * 3600;
//   //   var heure_depSecTotales = heure_depMin + heure_depHeures + heure_depSec;
//   //   // temps de la regate entre le depart et le declenchement de l'arrivée en secondes
//   //   var tempsRegate = heure_arr - heure_dep;
//   //   // temps total du bateau en secondes
//   //   var tempsBateau = tempsRegate + curtime;
//   //   // reconvertion duree regate de seconde a h/min/sec
//   //   var DureeRegate = tempsRegate;
//   //   var RegateJours = Math.floor(DureeRegate / (3600 * 24));
//   //   DureeRegate -= RegateJours * 24 * 3600;
//   //   var RegateHours = Math.floor(DureeRegate / 3600);
//   //   DureeRegate -= RegateHours * 3600;
//   //   var RegateMinutes = Math.floor(DureeRegate / 60);
//   //   DureeRegate -= RegateMinutes * 60;
//   //   var RegateSeconds = DureeRegate;
//   //   var resultRegate = RegateJours + 'j ' + RegateHours + 'h ' + RegateMinutes + 'min ' + RegateSeconds + 's ';
//   //   // reconvertion duree total bateau de seconde a h/min/sec
//   //   var DureeBateau = tempsBateau;
//   //   var BateauJours = Math.floor(DureeBateau / (3600 * 24));
//   //   DureeBateau -= BateauJours * 24 * 3600;
//   //   var BateauHours = Math.floor(DureeBateau / 3600);
//   //   DureeBateau -= BateauHours * 3600;
//   //   var BateauMinutes = Math.floor(DureeBateau / 60);
//   //   DureeBateau -= BateauMinutes * 60;
//   //   var BateauSeconds = DureeBateau;
//   //   var resultBateau = BateauJours + 'j ' + BateauHours + 'h ' + BateauMinutes + 'min ' + BateauSeconds + 's ';
//   //   alert(resultBateau);
//   // }
// }
// document.addEventListener("DOMContentLoaded", init, false);
