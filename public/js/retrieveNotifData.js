    
    axios.get(basePath+'/api/schedules').then((res)=>{
        const retrievedData = res.data;
        let select = document.getElementById('scheduleTypes');
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

    axios.get(basePath+'/api/notifTypes').then((res)=>{
        const retrievedData = res.data;
        let select = document.getElementById('notifTypes');
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
