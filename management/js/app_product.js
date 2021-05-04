function showDate(id){
    if(document.getElementById){
        let result = document.getElementById(id);
            result.style.display = (result.style.display == 'none') ? 'block' : 'none';
    }
}