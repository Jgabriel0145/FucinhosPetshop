<!DOCTYPE html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script>
// Ativo 
var menuItem = document.querySelectorAll('.item-menu')
var Icon = document.querySelectorAll('.icon')
var txtLink = document.querySelectorAll('.txt_link')
function selectLink(){
    menuItem.forEach((item)=>
        item.classList.remove('ativo'))
    this.classList.add('ativo')
    Icon.forEach((item)=>
        item.classList.remove('ativo'))
    this.classList.add('ativo')
    txtLink.forEach((item)=>
        item.classList.remove('ativo'))
    this.classList.add('ativo')
}
menuItem.forEach((item)=>
    item.addEventListener('click', selectLink)
)
//Expandir o menu 
var btnExp = document.querySelector('#expandir')
var menuLateral = document.querySelector('.menu-lateral')
    btnExp.addEventListener('click', function(){
        menuLateral.classList.toggle('expandir')
})
</script>