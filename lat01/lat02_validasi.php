<script>
    function validasi(){
        var npm = document.getElementById('npm').value;
        if(npm == ""){
            alert('NPM harus di isi!');
            document.getElementById('npm').focus();
            return false;
        }else if(npm.length != 4){
            alert('NPM harus 4 digit');
            document.getElementById('npm').focus();
            return false;            
        }
    }
</script>

<?php 
    echo "
        <form action='lat03.php' method=get onsubmit='return validasi();'>
        <input type=text name=text placeholder=NPM_Anda id=npm maxlength=4>

        <input type=submit value=simpan>
        </form>
    ";
?>