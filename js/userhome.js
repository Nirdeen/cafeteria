
$(".cat").click(function(){
    $x = [];
    $("#tableoforders tr").each(function(){
        $x.push($(this).attr("id"))
    })
    $picpath = $(this).children().children().children("img").attr("src");
    $productname = $(this).children().children().children("h6").html();
    $productprice =  $(this).children().children().children("div").children("button").html();
    $productID = $(this).children().children().children("input").attr("value");
    if(!$x.includes($productID))
   { $x.push($productID);


    $("form").children("div").children("table").children("tbody").append(`<tr id="${$productID}" class"newrows" style="border-bottom: #fbb3485c 1px solid;">
    <td style="width: 30%; padding: 5%; margin-bottom: 5%;">
    <img src="${$picpath}" >
    <input disabled type="text" value="${$productname}" style="border: none;">
    </td>
   
    <td style="width: 30%;">

        <button class="btn addbtn btn-white btn-minuse" type="button"
            style="display: inline-block;"><i class="fas fa-minus-circle"></i></button>
        <input name="quantity[]" type="number" maxlength="1" value="1" min="1"  class="input1"
            style="width: 15%; display: inline-block;padding: 0%; text-align: center;">
        <button class="btn addbtn btn-red btn-pluss" type="button"
            style="display: inline-block;"><i class="fas fa-plus-circle"></i></button>
    </td>
    
    <td style="width: 30%; margin-bottom: 5%;" class="productprice">
        <h6 style="display: inline-block;"><span>${$productprice}</span> LE</h6>
    </td>

    <td style="width: 30%; margin-bottom: 5%;" class="totalprice">
    <h6 style="display: inline-block;" ><span class="totalpricenumber" >${$productprice}</span> LE</h6>
    </td>
   
    <td style="width: 30%; margin-bottom: 5%;">
        
            <i class="far fa-times-circle" style="color: red;cursor: pointer;"></i>
            <input type="hidden" value="${$productID}" name="productid[]">
            
    </td>



    

</tr>` );
let array = document.getElementsByClassName("totalpricenumber")
    var sum=0;
    for (var i =0 ; i<array.length ; i++)
    {sum += Number(array[i].innerHTML);}
    $(".finalprice").html(sum);

$(".fa-times-circle").click(function(){
   
    $(this).parent().parent().remove();
    let array = document.getElementsByClassName("totalpricenumber")
    var sum=0;
    for (var i =0 ; i<array.length ; i++)
    {sum += Number(array[i].innerHTML);}
    $(".finalprice").html(sum)
})
$(".fa-plus-circle").click(function(){
    $(this).parent().siblings("input").attr('value',Number($(this).parent().siblings("input").attr('value'))+1);
    $(this).parent().parent().siblings(".totalprice").children("h6").children("span").html($(this).parent().siblings("input").attr('value')*Number($(this).parent().parent().siblings(".productprice").children("h6").children("span").html()));
    let array = document.getElementsByClassName("totalpricenumber")
    var sum=0;
    for (var i =0 ; i<array.length ; i++)
    {sum += Number(array[i].innerHTML);}
    $(".finalprice").html(sum)
    
})
$(".fa-minus-circle").click(function(){
    
    if(Number($(this).parent().siblings("input").attr('value'))>1)
    {$(this).parent().siblings("input").attr('value',Number($(this).parent().siblings("input").attr('value'))-1)
    $(this).parent().parent().siblings(".totalprice").children("h6").children("span").html($(this).parent().siblings("input").attr('value')*Number($(this).parent().parent().siblings(".productprice").children("h6").children("span").html()));
    let array = document.getElementsByClassName("totalpricenumber")
    var sum=0;
    for (var i =0 ; i<array.length ; i++)
    {sum += Number(array[i].innerHTML);}
    $(".finalprice").html(sum)
}

})




}else{alert("you have already added this product")}

})

$("#makeorderusersubmit").click(function(e){
    e.preventDefault();

    let arraylength = document.getElementsByTagName('table')[6].rows.length-3;
    var orders = [];
            for (var i =3 ; i<arraylength+3 ; i++)
            {orders.push({id:parseInt(document.getElementsByTagName('table')[6].rows[i].cells[4].children[1].value),quantity:parseInt(document.getElementsByTagName('table')[6].rows[i].cells[1].children[1].value)})
            
            
           
        
           
            
            }
            console.log(orders);
            if(orders.length>0)
            {
                $("#makeorderuser").submit()
            }
            else{
                alert("no product is selected")
            }




           

            // var serializedorders = orders.serialize()
            
        //     $inputs.prop("disabled", true);
        //     $.ajax({
        //         url:'test.php',
        //         type:'POST',
        //         data: serializedorders
        //    }).done(function(data){
        //     console.log(data);
        //   });


        // if (window.XMLHttpRequest) {
        //     // script for browser version above IE 7 and the other popular browsers (newer browsers)
        //     xmlhttp = new XMLHttpRequest();
        //   } else {
        //     // script for the IE 5 and 6 browsers (older versions)
        //     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        //   }
        //   xmlhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //       // get the element in which we will use as a placeholder and space for table
        //       document.getElementById("txt_hint").innerHTML = this.responseText;
        //     }

        
})
