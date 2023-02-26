var begin_date = document.getElementById('begin_date');
var end_date = document.getElementById('end_date');
var form = document.getElementById('leaveForm');

form.addEventListener('submit', function(e){
    e.preventDefault()
    if(begin_date.value){
        if(new Date(begin_date.value).getTime() > new Date(end_date.value).getTime()){
            // console.log(document.getElementById('dateErr'))
            $error = document.getElementById('dateErr')
            $error.textContent = 'begin date should been grater than end date !'
            $error.classList.add('py-2 px-3')
        }else{
            $error.classList.remove('py-2 px-3')
            e.target.submit()
        }
    }else{
        e.target.submit()
    }
})
