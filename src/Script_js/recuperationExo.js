window.addEventListener("load", function() {

    console.log(document.querySelector("script[tableauExo]"))
    const tableauExo = document.querySelector("script[tableauExo]").getAttribute("tableauExo")
    console.log(tableauExo)

    /*for (let i = 0; i < tableauExo.length; i++) {

        const page = document.getElementById('page');
        page.insertAdjacentHTML('afterbegin', tableauExo[i]);

    }*/
})