import IMask from 'imask';
const element = document.getElementById('number-required');
const maskOptions = {
    mask: '+{7}(000)000-00-00'
};
if (element){
    const mask = IMask(element, maskOptions);
}
let clientAddChoiceRadios=document.getElementsByClassName("client-add-choice-radio");
for (let input of clientAddChoiceRadios) {
    input.addEventListener("click",fieldActivation)
}
function fieldActivation() {
    var option = document.querySelector('input[name="option"]:checked').value;
    if (option === "option1") {
        document.getElementById("clientField").style.display = "none";
        document.getElementById("carField").style.display = "block";
        document.getElementById("id-client-select").setAttribute('required', '');
        document.getElementById("gender-select").removeAttribute('required');
        document.getElementById("fio-required").removeAttribute('required');
        document.getElementById("fio-required").removeAttribute('min:3');
        document.getElementById("gender-select").removeAttribute('required');
    } else if (option === "option2") {
        document.getElementById("clientField").style.display = "block";
        document.getElementById("carField").style.display = "none";
        document.getElementById("gender-select").setAttribute('required', '');
        document.getElementById("id-client-select").removeAttribute('required');
        document.getElementById("fio-required").setAttribute('required', '');
        document.getElementById("fio-required").setAttribute('min:3', '');
        document.getElementById("number-required").setAttribute('required', '');
    }

}


