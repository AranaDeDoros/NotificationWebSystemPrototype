

// user tags
const input = document.querySelector('input[name=tags]'),
tagify = new Tagify( input, {
    duplicates: false,
    editTags: false,
    originalInputValueFormat: valuesArr => valuesArr
                              .map(item => item.uId).join(',')   
} );

/*onchange event to assign its current value
 to the input that will be sent to the server*/
input.addEventListener('change', (e)=>{
        
});

//button to remove all entered users
const deselectAllBtn = document.getElementById('btnTagsDes')
                      .addEventListener('click', ()=>{
                      tagify.removeAllTags();});


//the autocomplete
let xhr;
let queryInput = document.getElementById('query');
let usersList = document.getElementById('tags');
let entity = window.location.href.includes('group') ? 'users' : 'groups';
let requestUrl = basePath+'/search/'+entity;
console.log(requestUrl);

new autoComplete({
    
    selector: 'input[name="q"]',
    minChars: 3,    
    delay: 150,
    cache: true,
    menuClass: '',
    
    source: function(term, response){
        try { xhr.abort(); } catch(e){}
        xhr = $.getJSON(requestUrl, { q: term }, function(data){
            let rawResponse = data;
            let suggestions = prepareSuggestions(rawResponse, entity);
            /*let suggestions = [];
            rawResponse.forEach((e)=>{
                suggestions.push(e.name+"|"+e.id);
            });
            console.log(data);
            console.log(suggestions);*/
            response(suggestions);
            
        });
    },

    renderItem: function (item, search){
    
        let attributeValues = item.split("|");
        let entityValue = attributeValues[0];
        let uIdValue = attributeValues[1];
        console.log(item);
        //console.log(results);
        let element = returnEntityDiv(entity, entityValue, uIdValue);
        //'<div class="autocomplete-suggestion"'+'userName="'+username+'" data-uId="uId'+uId+'">'+username+'</div>';
        //console.log(e);
        return element;
    },

    onSelect: function(e, term, item){

        queryInput.value = item.getAttribute('username');
        currentTag =  {value: item.getAttribute('username'),
                       username: item.getAttribute('username'), 
                       uId: item.getAttribute('data-uId')};

        tagify.addTags([
        
            currentTag
            
        ]);
        
        queryInput.value = '';
    }
});

 const prepareSuggestions = (arr, entityName)=>{

    let suggestions = [];
    arr.forEach((e)=>{
        if(entityName === 'users'){
            suggestions.push(e.name+"|"+e.id);
        }
        else{
            suggestions.push(e.groupName+"|"+e.id);
        }        
    });
    return suggestions;

 };

 const returnEntityDiv = (entityName, entityValue, uIdValue) => {

    let entityAttribute = entityValue;
    let uIdAttribute = uIdValue;
    let elementDiv = '';

    if(entityName === 'users'){

        elementDiv = `<div class="autocomplete-suggestion" userName="${entityAttribute}" 
                      data-uId="uId${uIdAttribute}">${entityAttribute}</div>`;

    }
    else{

        elementDiv = `<div class="autocomplete-suggestion" userName="${entityAttribute}" 
                      data-uId="uId${uIdAttribute}">${entityAttribute}</div>`;
    }

    return elementDiv;

 }
