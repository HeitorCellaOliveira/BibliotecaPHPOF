<script>
function validaSenha(){
        NovaSenha = document.getElementById('resenha').value;
        CNovaSenha = document.getElementById('resenha').value;
        if (NovaSenha != CNovaSenha) {
            alert("SENHAS DIFERENTES!\nFAVOR DIGITAR SENHAS IGUAIS"); 
        } else {
            document.FormSenha.submit();
        }
    }
    </script>