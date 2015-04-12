function legend(parent, data) {
    parent.className = 'legend';
    var datas = data.hasOwnProperty('datasets') ? data.datasets : data;

    // remove possible children of the parent
    while(parent.hasChildNodes()) {
        parent.removeChild(parent.lastChild);
    }

    datas.forEach(function(d) {
        var title = document.createElement('span');
        title.className = 'title';
        parent.appendChild(title);

        var colorSample = document.createElement('div');
        colorSample.className = 'color-sample';
        colorSample.style.backgroundColor = d.hasOwnProperty('strokeColor') ? d.strokeColor : d.color;
        colorSample.style.borderColor = d.hasOwnProperty('fillColor') ? d.fillColor : d.color;
        colorSample.style.padding  = "10px 10px 10px 10px";
        colorSample.style.width  = "10%";
        

        
        title.appendChild(colorSample);
        title.style.fontSize="14px";
        title.style.color=d.hasOwnProperty('strokeColor') ? d.strokeColor : d.color;
        title.style.width="90%";
        title.style.float="right";
       

        var text = document.createTextNode(d.label);
        title.appendChild(text);
    });
}
