//show clients on table

    const renderClient = (data)=>{
        const html = data.data.map(client =>{
            return "<tr><td>"
                    +client.username+
                "</td><td>"+client.password+"</td><td>"
                    +client.tel+
                "</td><td>"
                    +client.country+
                "</td><td>"+client.adress+"</td><td>"
                    +client.locality+
                `</td><td><button type="submit"onclick="onEdit(this,${client.id})" id="edit">Edit</button></td>
                <td><button type="submit"id="delete" onclick="del(${client.id})">Delete</button></td>`;
        }).join('');
        document.querySelector('#list').insertAdjacentHTML('beforeend',html); 
    }
    fetch("http://127.0.0.1:8000/API/index").then(response =>{
        return response.json();
       
    }).then(data =>renderClient(data));


//Delete a client

function del(id){
    fetch(`http://127.0.0.1:8000/API/delete/${id}`,{
        method:'DELETE'
    })
    .then(res=>res.json())
    .then(()=>location.reload())
}



        