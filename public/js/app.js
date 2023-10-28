$(document).ready(function () {
  $("#data").DataTable();
});

$("#idChercheur").change(function (e) {
  e.preventDefault();
  const id = $("#idChercheur").val();
  $.ajax({
    type: "get",
    url: `fetch-chercheurs/${id}`,
    dataType: "json",
    success: function (response) {
      console.log();
      $("#nom").val(response.nom);
      $("#postnom").val(response.postnom);
      $("#prenom").val(response.prenom);
      $("#sexe").val(response.sexe);
    },
  });
});

$(".edit").click(function (e) {
  e.preventDefault();
  const id = Number($(this).attr("href").split("/")[2]);
  $.ajax({
    type: "get",
    url: `fetch-abonnements/${id}`,
    dataType: "json",
    success: function (response) {
      $("#edit").attr("action", `/abonnements/edit/${response.id}`);
      $("#idChercheur-edit").val(response.idChercheur);
      $("#nom-edit").val(response.nom);
      $("#postnom-edit").val(response.postnom);
      $("#prenom-edit").val(response.prenom);
      $("#sexe-edit").val(response.sexe);
      $("#dateDebut-edit").val(response.dateDebut);
      $("#dateFin-edit").val(response.dateFin);
    },
  });
});

$(".delete").click(function (e) {
  e.preventDefault();
  const id = Number($(this).attr("href").split("/")[2]);
  $.ajax({
    type: "get",
    url: `fetch-abonnements/${id}`,
    dataType: "json",
    success: function (response) {
      $("#delete").attr("action", `/abonnements/delete/${response.id}`);
      $("#chercheur").html(response.nom+ ' '+response.postnom+' '+response.prenom);
    },
  });
});