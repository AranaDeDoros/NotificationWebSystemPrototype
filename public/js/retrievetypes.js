    
    axios.get(basePath+'/api/groupTypes').then((res)=>{
        const retrievedData = res.data;
        let select = document.getElementById('groupTypeAdd');
        let option = "";
        let dataLength = retrievedData.length;
        console.log(dataLength);
        for (let i = 0; i < dataLength; i++) {
            if(i == 0){
                option = `<option selected value="${retrievedData[i].id}">${retrievedData[i].description}</value>`;    
            }
            else{
                option = `<option value="${retrievedData[i].id}">${retrievedData[i].description}</value>`;
            }
            select.insertAdjacentHTML('beforeend', option);            
        }
    })
        .catch((e)=>{
            alert(e);
        });