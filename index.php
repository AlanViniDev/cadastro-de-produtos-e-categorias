
<head>
  <meta charset="UTF-8">
</head>
<!-- Chama a biblioteca jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Formulario de cadastro -->
<h1> Cadastro de Produtos </h1>

<form action = "" method = "POST">
<input placeholder = "Categoria" type = "text" name = "categoria" id = "categoria"/>
<button onclick = "CadastrarCategorias(this.value)" value = "Cadastrar Categorias">Cadastrar Categoria</button>
</form>

<form action = "" method = "POST">
<input placeholder = "Produto" type = "text" id = "produto"/> </br>
<input placeholder = "Marca" type = "text" id = "marca"/> </br>
<input placeholder = "Preço" type = "text" id = "preco"/> </br>
<input placeholder = "Quantidade" type = "text" id = "quantidade"/> </br>
<select class = 'categorias' id = "categoria_selec">
</select></br>
<button onclick = "CadastrarProdutos(this.value)" value = "Cadastrar Produtos">Cadastrar Produto</button>
</form>

<script type = "text/javascript">

/* Listar categorias */
jQuery(document).ready(function () {
    jQuery.ajax({
        url: 'classes/Categorias.php',
        ascyn: false,
        type: 'POST',
        dataType: 'html',
        success: function (data){
            
            var dados = new Array();
            var categorias = new Array();
            
            var ArrayDeStrings = new Array();
            var ArrayDeStrings = data.split(',');
            
            /*Adiciona os dados trazidos pela requisição ajax em um array*/
            dados.push(data.split(','));
            var categoria = "Categorias";
            categorias.push(`
                <option>${categoria}</option>
            `);
            /* Carrega os dados da tabela */
            dados.forEach(function (elem, index) {
                for(i = 0; i <= (elem.length-1); i++){
                    categorias.push(`
                        <option>${elem[i].replace('"','').replace('"','').replace('[[[','').replace(']]]','')}</option>
                    `);
                }
            });
            /*Lista as categorias via jQuery*/
            jQuery(".categorias").html(categorias.join('')); 
        }
    });
});

function CadastrarCategorias(param){
    var param = param;
    var categoria = jQuery("#categoria").val();
    jQuery.ajax({
        url: 'classes/Cadastro.php',
        ascyn: false,
        data:{
            'param': param,
            'categoria': categoria
        },
        type: 'POST',
        dataType: 'html',
        success: function (data){
        }
    });
}


function CadastrarProdutos(param){
    var param = param;

    var produto = jQuery("#produto").val();
    var marca = jQuery("#marca").val();
    var preco = jQuery("#preco").val();
    var quantidade = jQuery("#quantidade").val();
    var categoria_selec = jQuery("#categoria_selec").val();
    
    jQuery.ajax({
        url: 'classes/Cadastro.php',
        ascyn: false,
        data:{
            'param': param,
            'produto': produto,
            'marca': marca,
            'preco': preco, 
            'quantidade': quantidade,
            'categoria_selec': categoria_selec
        },
        type: 'POST',
        dataType: 'html',
        success: function (data){
            alert(data);
        }
    });
}
</script>



