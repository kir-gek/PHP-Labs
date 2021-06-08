function addElement(table_name){
    let value = document.getElementById('arrLength');
    
    let t = document.getElementById(table_name).getElementsByTagName('TBODY')[0]; 
    let index=t.rows.length; 
    let row = document.createElement("tr");
    t.appendChild(row);
    let td1 = document.createElement("TD");
    let td2 = document.createElement("TD");
    let firstTd = `<label>№${++index}</label>`;
    value.setAttribute('value', index);
    var celcontent=`<input type="text" name="element${--index}">`;
    td2.className='element_row';
    row.appendChild(td1);
    row.appendChild(td2);

    td1.innerHTML = firstTd;
    td2.innerHTML  = celcontent;
}