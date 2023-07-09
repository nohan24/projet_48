let form = document.getElementById("loginForm");
let output = document.getElementById("result");

form.addEventListener("submit", function (event) {
  event.preventDefault(); // Empêche la soumission normale du formulaire

  let formData = new FormData(form); // Récupère les données du formulaire

  fetch("./controllers/login_controller.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text()) // Parse the response as text
    .then((data) => {
      if(data != ' Identifiant ou mot de passe incorrecte ... '  ){
        window.location.href = "/Gestion_home/views/main.php";
      }
    })
    .catch((error) => console.error(error));

});
