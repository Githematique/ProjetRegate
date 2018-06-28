// $.post("/admin/regate/setStartTime",
//     {
//         date : heure_dep
//     },
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//     function(data, status){
//         alert('Date stored');
//     });

$.ajax({
    type: "POST",
    url: '/admin/regate/setStartTime',
    data: {
     heure_dep: heure_dep
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function() {
      console.log("Hour added");
    }
  });