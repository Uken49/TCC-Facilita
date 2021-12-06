//+-------------------------------------+
//| BOOTSTRAP TOUR - PROGRAMADOR VIKING |
//|     www.programadorviking.com.br    |
//+-------------------------------------+

//-> Instanciando o objeto tour.
var tour = new Tour({
    placement: "auto",
    steps: [
        {
            element: "#informacoesGerais",
            title: "Informações Gerais",
            content: "Nesta área é possível ver informações resumidas do que está acontecendo no site."
        },
        {
            element: "#barraLateral",
            title: "Menu Lateral",
            content: "Por esse menu lateral você poderá navegar por toda a área do administrador."
        },
        {
            element: "#barraInicio",
            title: "Menu Lateral - Inicio",
            content: "Aqui é onde fica as informações de gerais de forma resumida."
        },
        {
            element: "#barraGraficos",
            title: "Menu Lateral - Gráfico",
            content: "Nesta parte você poderá ver os dados sobre a utilização do site em forma de gráficos."
        },
        {
            element: "#barraListaUsuario",
            title: "Menu Lateral - Lista Usuários",
            content: "Aqui é possível pesquisar,notificar e excluir contas de usuários."
        },
        {
            element: "#barraOutros",
            title: "Menu Lateral - Outros",
            content: "Nesta parte é onde fica outros recursos do sistema."
        }

    ],
    template:
    "<div class='popover tour'> <div class='arrow'></div> <h3 class='popover-title'></h3> <div class='popover-content'></div> <div class='popover-navigation'> <button class='btn btn-default' data-role='prev'>« Anterior</button> <span data-role='separator'>|</span> <button class='btn btn-default' data-role='next'>Próximo »</button> </div> <button class='btn btn-default' data-role='end'>Finalizar</button> </div>"
});

//-> Prepara para iniciar o tour.
tour.init();

//-> Inicia o tour.
tour.start();