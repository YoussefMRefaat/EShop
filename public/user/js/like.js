function like(id){
    var obj = new XMLHttpRequest();
    obj.open('POST' , '/likes/' + id);
    obj.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');
    obj.setRequestHeader('X-CSRF-TOKEN' , document.head.querySelector('[name="csrf-token"]').content);
    obj.send();
    obj.onreadystatechange = function (){
        if(obj.status === 201 && obj.readyState === 4){
            console.log(document.getElementById('like'+id).innerHTML)
            liked(id);
            console.log(document.getElementById('like'+id).innerHTML)
        }
        if(obj.status === 200 && obj.readyState === 4){
            unliked(id);
        }
    }
}

function liked(id){
    document.getElementById('like'+id).innerHTML = "<i class='fas fa-heart text-primary mr-1'></i>Unlike"
}

function unliked(id){
    document.getElementById('like'+id).innerHTML = "<i class='far fa-heart text-primary mr-1'></i>Like"
}
