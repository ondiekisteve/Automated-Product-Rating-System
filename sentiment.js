var affin;
function preload() {
    affin=loadJSON('affin.json');
}
function setup() {
    noCanvas();
    console.log(affin);
    var txt=select('.message');
    var inputrate=select('#inputrate');
    txt.input(typing);
    function typing() {
        var totalScore=0;
        var scoreWords=[];
        var textInput=txt.value();
        var words=textInput.split(/\W/);
        for(var i=0;i<words.length;i++){
            var word=words[i].toLowerCase();
            if(affin.hasOwnProperty(word)){
                var score =affin[word];
                totalScore+=Number(score);
                scoreWords.push(word+':'+score);
            }
        }
        var rate=select('#rate');
        rate.html(Number.parseFloat(totalScore/words.length).toFixed(2));
    }
}
function draw() {

}