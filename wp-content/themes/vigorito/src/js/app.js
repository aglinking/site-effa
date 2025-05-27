window.onload = function () {
  // Menu hamburger
  let buttonMenu = document.querySelectorAll(".hamb");
  buttonMenu
    ? buttonMenu.forEach((buttonMenu) => {
        buttonMenu.addEventListener("click", () => {
          if (buttonMenu.classList.contains("open-hamb")) {
            buttonMenu.classList.remove("open-hamb");
            document
              .querySelector("#nav-menu-container")
              .classList.remove("container-menu-aberto");
            document.querySelector("html").classList.remove("no-scroll");
            document.querySelector("body").classList.remove("no-scroll");
          } else {
            buttonMenu.classList.add("open-hamb");
            document
              .querySelector("#nav-menu-container")
              .classList.add("container-menu-aberto");
            document.querySelector("body").classList.add("no-scroll");
            document.querySelector("html").classList.add("no-scroll");
          }
        });
      })
    : false;
};

// Seleciona todos os formulários na página
const forms = document.querySelectorAll(".formulario");

// Verifica se há algum formulário antes de aplicar os eventos
if (forms.length > 0) {
  // Aplica o evento de submit a cada formulário
  forms.forEach(function (form) {
    form.addEventListener("submit", function (e) {
      // Exibe o overlay ao submeter qualquer formulário
      document.getElementById("overlay-forms").style.visibility = "visible";
    });
  });
}

// called when the window is scrolled.
window.onscroll = function (e) {
  if (window.pageYOffset || document.documentElement.scrollTop > 100) {
    document.querySelector("header").classList.add("header-fixed");
    document.querySelector("header").style.transition = "0.7s";
    document.querySelector("header").classList.add("shadow");
    document.querySelector("#navigator-mc").classList.add("header-fixed-mc");
    document.querySelector("#navigator-mc").style.transition = "0.7s";
  } else {
    document.querySelector("header").classList.remove("header-fixed");
    document.querySelector("header").classList.remove("shadow");
    document.querySelector("#navigator-mc").classList.remove("header-fixed-mc");
  }
};

function selectdMc(type) {
  if (type == "novos") {
    var selectNovos = document.getElementById("mc-novos");
  } else if (type == "agendamento") {
    var selectNovos = document.getElementById("mc-agendamento");
  }
  var selectedValue = selectNovos.options[selectNovos.selectedIndex].value;
  var formulario = document.getElementById("form-search");
  formulario.action = selectedValue;
  formulario.method = "post";
}

function validType() {
  var selectType = document.getElementById("s-oque-deseja");
  var selectedValue = selectType.options[selectType.selectedIndex].value;
  var formulario = document.getElementById("form-search");
  var selectNovos = document.getElementById("mc-novos");
  var selectAgendamento = document.getElementById("mc-agendamento");
  var selectSeminovos = document.getElementById("mc-seminovos");
  selectNovos.selectedIndex = 0;
  selectSeminovos.selectedIndex = 0;

  if (selectedValue == "Novos") {
    selectSeminovos.style.display = "none";
    selectAgendamento.style.display = "none";
    selectNovos.style.display = "block";
    selectSeminovos.setAttribute("disabled", "disabled");
    selectAgendamento.setAttribute("disabled", "disabled");
    selectNovos.removeAttribute("disabled");
  } else if (selectedValue == "Agendamento") {
    selectSeminovos.style.display = "none";
    selectNovos.style.display = "none";
    selectAgendamento.style.display = "block";
    selectSeminovos.setAttribute("disabled", "disabled");
    selectNovos.setAttribute("disabled", "disabled");
    selectAgendamento.removeAttribute("disabled");
  } else {
    selectSeminovos.style.display = "block";
    selectNovos.style.display = "none";
    selectAgendamento.style.display = "none";
    selectNovos.setAttribute("disabled", "disabled");
    selectAgendamento.setAttribute("disabled", "disabled");
    selectSeminovos.removeAttribute("disabled");

    var selectedIndex = selectType.selectedIndex;
    var selectedOption = selectType.options[selectedIndex];
    var urlValue = selectedOption.getAttribute("url");
    formulario.action = urlValue;
    formulario.method = "get";
  }
}

function carregarModelos() {
  var selectMarca = document.getElementById("selectMarca");
  var marcaSelecionada = selectMarca.options[selectMarca.selectedIndex].value;

  var wpVars = JSON.parse(hoist);
  var xhr = new XMLHttpRequest();
  var url = wpVars.admin_url;

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // loading.style.display = "none";
      var selectModelo = document.getElementById("selectModelo");
      selectModelo.innerHTML = xhr.responseText;
    }
  };

  xhr.send("action=get_modelos_por_marca&marca=" + marcaSelecionada);
}

function redirectWithParams(selectedValue) {
  // Obter a URL atual
  var currentURL = window.location.href;

  // Verificar se já existem parâmetros na URL
  var separator = currentURL.includes("?") ? "&" : "?";

  // Construir a nova URL com os parâmetros atuais e os novos parâmetros
  var newURL = currentURL + separator + selectedValue;

  // Redirecionar para a nova URL
  window.location.href = newURL;
}

document.addEventListener("DOMContentLoaded", function () {
  // Ao clicar no botão de Unidades
  var unidadesButton = document.querySelector(
    '.button-1[aria-controls="collapseunidade"]'
  );
  unidadesButton.addEventListener("click", function () {
    // Fechar o card de Telefones, se estiver aberto
    var telefoneCollapse = document.getElementById("collapsetelefone");
    if (telefoneCollapse.classList.contains("show")) {
      telefoneCollapse.classList.remove("show");
    }
  });

  // Ao clicar no botão de Telefones
  var telefoneButton = document.querySelector(
    '.button-1[aria-controls="collapsetelefone"]'
  );
  telefoneButton.addEventListener("click", function () {
    // Fechar o card de Unidades, se estiver aberto
    var unidadeCollapse = document.getElementById("collapseunidade");
    if (unidadeCollapse.classList.contains("show")) {
      unidadeCollapse.classList.remove("show");
    }
  });
});
