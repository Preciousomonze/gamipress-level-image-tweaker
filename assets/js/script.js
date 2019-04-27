/* script */
var $ = jQuery;
$(document).ready(function(){
    let imgUrl = pkGamiObj.imgUrl;
    let ranksDiv = $('.gamipress-rank-image');
    if(ranksDiv.length > 0){
        ranksDiv.each(function(i,el){
            let _id = `gamipress-rank-img${i}`;
            $(this).attr('id',_id);
            let link =  $(`#${_id} a`).attr('href');
            linkh = link.replace('\/\/','');
            let linkData = linkh.split('/');
            let level = linkData[(linkData.length - 2)];//get the last link to know level no
            let levelNum = level.split('-')[1];
            let newImg = `${imgUrl}${levelNum}.jpg`;
            $(`#${_id} a img.gamipress-rank-thumbnail`).attr('src',newImg);
            $(`#${_id} a img.gamipress-rank-thumbnail`).attr('srcset',`${newImg} 150w, ${newImg} 50w, ${newImg} 100w,`);
        });
    }
});