@extends('layouts.general')

@section('content')


<div class="autocomplete-suggestion">
    
</div>

<form class="form" onsubmit="return false"  method="get" >
    <input id="query" type="text" class="form-control" name="q" placeholder="username">
    
</form>

<textarea id="txt" class="form-control" name="ok" value=""></textarea>

<script>

let xhr;
let queryInput = document.getElementById('query');
let textArea = document.getElementById('txt');
let entity = window.location.href.includes('user') ? 'users' : 'groups';

new autoComplete({
    selector: 'input[name="q"]',
    minChars: 3,
    delay: 150,
    cache: true,
    menuClass: '',
    
    source: function(term, response){
        try { xhr.abort(); } catch(e){}
        xhr = $.getJSON("search/"+entity, { q: term }, function(data){
            let rawResponse = data;
            let suggestions = prepareSuggestions(rawResponse, 'groups');
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
    
        let results = item.split("|");
        let username = results[0];
        let uId = results[1];
        //console.log(results);
        let e = '<div class="autocomplete-suggestion"'+'userName="'+username+'" data-uId="uId'+uId+'">'+username+'</div>';
        console.log(e);
        return e;
    },

    onSelect: function(e, term, item){
        
        queryInput.value = item.getAttribute('username');
        textArea.value += item.getAttribute('username')+"\n";
    }
});

 const prepareSuggestions = (arr, entity)=>{

    let suggestions = [];
    arr.forEach((e)=>{
        if(entity === 'users'){
            suggestions.push(e.name+"|"+e.id);
        }
        else{
            suggestions.push(e.groupName+"|"+e.id);
        }        
    });
    return suggestions;

 };

</script>
@endsection
