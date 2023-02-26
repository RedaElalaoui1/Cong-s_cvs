var stars = document.querySelectorAll('.fa-star')

const tableRow = function(cv){
return  `
<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <td class="py-4 px-6">
    ${cv.id}
    </td>
    <td class="py-4 px-6">
    ${cv.name}
    </td>
    <td class="py-4 px-6">
    <div class="w-10 hover:bg-slate-200 rounded-lg"><a href="/cvs/image/${cv.id}"> <img class="w-10 h-10" src="/storage/images/pdf.png" alt=""> </a></div>
    </td>
    <td class="py-4 px-6">
    ${cv.note}
    </td>
    <td class="py-4 px-6">
    ${cv.user.name ? cv.user.name : 'deleted' }
    </td>
    <td class="py-4 px-6">
    <div class="flex">
        <a class="mr-4" href="/cvs/edit/${cv.id}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
            <img class="h-5 w-5" src="/storage/icons/edit.svg" />
        </a>
        <a href="/cvs/delete/${cv.id}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline " onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'))">
            <img class="h-5 w-5" src="/storage/icons/delete.svg" />
        </a>
    </div>
    </td>
</tr>
`
}
stars.forEach(function(star){
    star.addEventListener('click', function(){
        stars.forEach(function(s){
            if(s.id <= star.id){
                s.classList.add('text-yellow-500')
            }else{
                s.classList.remove('text-yellow-500')
            }
        })
        filter(star.id)
    })
})

// document.querySelectorAll('.pagination a').forEach(function (link){
//     link.addEventListener('click', function() {
//         e.preventDefault();

//         document.querySelectorAll('li').classList.remove('active');
//         link.parentElement.addClass('active');

//         // var page = link.href = ;

//         filter(5, page);
//     })
// });

async function filter (note){
    var tableBody = document.getElementById('tableBody')
    try {
        const response = await window.axios.post(
            '/cvs/filter',
            {
                note: note
            }
        )
        let cvs = []
        if(cvs = response.data.cvs){
            tableBody.innerHTML = '' // empty table
            cvs.forEach(function(cv){
                tableBody.innerHTML += tableRow(cv)
            })
            console.log(cvs)
        }else{
            throw Error()
        }
    } catch (e) {
        console.log(e)
    }
}
