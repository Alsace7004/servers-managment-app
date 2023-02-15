
let hambuger = document.querySelector(".hambuger")
hambuger.addEventListener('click',()=>{
    document.querySelector("body").classList.toggle('active')
})


/****************************************************************/


/* let items  = document.querySelectorAll('.item')
items.forEach(item=>{
    
    item.addEventListener('click',function(e){
        e.preventDefault();
        items.forEach(it=>it.classList.remove("active"))
        this.classList.add('active')
    })
}) */