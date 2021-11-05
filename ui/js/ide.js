let editor;

window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/c_cpp");
    loadCode($("#languages").val());
}

function changeLanguage() {
    let language = $("#languages").val();
    editor.session.setMode("ace/mode/"+language); 
    loadCode(language);   
}
function loadCode($language){
    $.ajax({

        url: "/oide/app/default_code/loader.php",

        method: "POST",

        data: {
            language: $("#languages").val()
        },

        success: function(response) {
            editor.setValue(response, 1)
        }
    })
}

function executeCode() {

    $.ajax({

        url: "/oide/app/compiler.php",

        method: "POST",

        data: {
            language: $("#languages").val(),
            code: editor.getSession().getValue()
        },

        success: function(response) {
            
            $(".output").text(response)
        },
        error: function (err){
            executeCode();
        }
    })
}

function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("editor").style.width = "760px";
  }
  
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("editor").style.width = "1000px";
  }

  