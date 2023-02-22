function funcionarios() {
    $.ajax({
        url: "../controllers/ramaisController.php",
        type: "GET",
        success: (data) => {
            console.log(data);
            obj = JSON.parse(data);
            ramal = obj.informacoesRamal;

            console.log(data);
            // obj.informacoesRamal.forEach(element => {
            //     console.log(element);
            // });

            for (let i in ramal) {
                console.log(ramal[i]);
                $('#funcionarios').append(`<ul class="list-group">
                   <li class="list-group-item">${ramal[i].username}</li>
                </ul>`);
            }

        }
    }
    )
}