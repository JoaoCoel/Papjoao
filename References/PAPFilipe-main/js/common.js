function adicionaCarrinho(id){
    alert(id);
    $.ajax({
        url:"admin/AJAX/AJAXNovoProdutoCarrinho.php",
        type:"post",
        data: {
            idPrd:id
        },
        success:function(result){
            alert(result);
        }
    });
}



