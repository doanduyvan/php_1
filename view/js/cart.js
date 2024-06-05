function addcart(id_giohang,id_sanpham,soluong=1,xacnhan = 0){

    const data = {
        id_gh : id_giohang,
        id_sp : id_sanpham,
        sl : soluong,
        del : xacnhan
    }

    // const url = "http://localhost/hieuasm/model/suly_themgiohang.php";
    const url = "http://localhost/PHP1_xampp/ASM_PHP1_xampp/model/suly_themgiohang.php";
    fetch(url,{
        method: 'post',
        body: JSON.stringify(data),
        headers: {"Content-Type" : "application/json"}
    })
        .then(res=>{return res.json()})
        .then(data=>{
            getcart(id_giohang);
        })
        .catch(err=>{
            getcart(id_giohang);
            console.log(err);
        })

}


function getcart(id_giohang){
    // const url = "http://localhost/hieuasm/model/showcart.php";
    const url = "http://localhost/PHP1_xampp/ASM_PHP1_xampp/model/showcart.php";

    fetch(url,{
        method: 'post',
        body: JSON.stringify({id:id_giohang}),
        headers: {"Content-Type" : "application/json"}
    })
        .then(res=>{return res.json()})
        .then(data=>{
            showcart(data);
            showcartall(data);
        })
        .catch(err=>{console.log(err)})
}


function showcart(data){
    const boxsp = document.getElementById('box_sanpham');
    const box_soluong = document.getElementById('soluonghang');
    const box_tt = document.getElementById('box_tt');
    const box_chon = document.getElementById('box_chon');

    const soluongsp = data.length;
    let tongtien = 0;
    if(soluongsp == 0){
        boxsp.innerHTML = 'Không có sản phẩm được chọn';
    }else{
        boxsp.innerHTML = '';
    }
    
    data.forEach(item => {
        tongtien += item.giakm * item.soluong;
        const sanpham_display = `
    <div class="product-widget">
        <div class="product-img">
            <img src="../uploads/${item.hinh}" alt="">
        </div>
        <div class="product-body">
            <h3 class="product-name"><a href="?page=sanpham&id=${item.id}">${item.ten}</a></h3>
            <h4 class="product-price"><span class="qty">${item.soluong}x</span>${item.giakm} đ</h4>
        </div>
    </div>   `;
    boxsp.innerHTML += sanpham_display;
    });
    box_chon.textContent = soluongsp + " Sản phẩm được chọn";
    box_tt.textContent = "Tổng tiền: " + tongtien + " VND";
    box_soluong.textContent = soluongsp;
}


function thaydoisl(iddong,id_gh,id_sp){
   const soluong =  iddong.value;
   addcart(id_gh,id_sp,soluong,1);
}


function showcartall(data){
    // console.log(data);
    const soluongsp = data.length;
    const box_sp = document.getElementById('display_allcart');
    const tongtien = document.getElementById('tongtin_ingiohang');
    let tongtienall = 0;
    box_sp.innerHTML = '';

    data.forEach((item,index) => {
    let iddong = 'iddong' + index.toString();
    const tongtien1 = parseInt(item.giakm) * parseInt(item.soluong);
    tongtienall += tongtien1;
    let giakm1 =  parseInt(item.giakm);
    const sanpham = `
    <tr>
        <td class="shoping__cart__item">
            <img style="width:120px" src="../uploads/${item.hinh}" alt="">
<h5>${item.ten}</h5>
        </td>
        <td class="shoping__cart__price">
        ${giakm1.toLocaleString()}đ
        </td>
        <td class="shoping__cart__quantity">
            <div class="quantity">
                 <div class="pro-qty">
                    <span onclick='customsl(1,${iddong});thaydoisl(${iddong},${item.id_giohang},${item.id})' class='cong' >+</span>
                    <input type="text" value="${item.soluong}"  readonly  id='${iddong}' class='soluong_giohang'>
                    <span onclick='customsl(-1,${iddong});thaydoisl(${iddong},${item.id_giohang},${item.id})' class='tru'>-</span>
                </div>
            </div>
        </td>
        <td class="shoping__cart__total">
        ${tongtien1.toLocaleString()}đ
        </td>
        <td class="shoping__cart__item__close">
            <i class="fa-solid fa-xmark" onclick="xoasp_giohang(${item.id_giohang},${item.id_item})"></i>
        </td>
    </tr>`;

    box_sp.innerHTML += sanpham;
    })

    tongtien.textContent = tongtienall.toLocaleString() + " VND";

}

function xoasp_giohang(id_gh,id_ct){
    if(!confirm('bạn có muốn xóa',id_gh,'và',id_ct)){
        return;
    }
    // const url = "http://localhost/hieuasm/model/xoa_sanpham_giohang.php";
    const url = "http://localhost/PHP1_xampp/ASM_PHP1_xampp/model/xoa_sanpham_giohang.php";

    fetch(url,{
        method: 'post',
        body: JSON.stringify({id:id_ct}),
        headers: {"Content-Type" : "application/json"}
    })
        .then(res=>{return res.json()})
        .then(data=>{
           getcart(id_gh);
        })
        .catch(err=>{
            getcart(id_gh);
            console.log(err);
        })

}

function customsl(change,iddong){
    let the = iddong;
    var currentQuantity = parseInt(the.value);
    if (change < 0 && currentQuantity <= 1) {
        return;
    }
    var newQuantity = currentQuantity + change;
       the.value = newQuantity;

}



const form_tim  = document.getElementById('form_timkiem');
form_tim.addEventListener('submit',(e)=>{
    e.preventDefault();
    const input = document.getElementById('input_search').value;
    if(input == ''){
        show_cart_search(false);
        return
    }
    //  const url = "http://localhost/hieuasm/model/search_sp.php";
    const url = "http://localhost/PHP1_xampp/ASM_PHP1_xampp/model/search_sp.php";
     
    fetch(url,{
        method: 'post',
        body: JSON.stringify({key:input}),
        headers: {"Content-Type" : "application/json"}
    })
        .then(res=>{return res.json()})
        .then(data=>{
            show_cart_search(data);
        })
        .catch(err=>{console.log(err)})
})

function show_cart_search(data){
    const checksearch = document.getElementById('check_search');
    const box_show = document.querySelector('.showtimkiem');
    box_show.innerHTML = "";
    if(!data){
        return;
    }
    if(data.length==0){
        checksearch.checked = true;
        box_show.innerHTML = `
        <div class="khongtimthay">
        không tìm thấy sản phẩm này
        </div>`;
        return;
    }
    checksearch.checked = true;
    data.forEach((value,index)=>{
const show_item = `
        <div class="item_search">
			<div class="item_search_img">
				<img src="../uploads/${value.hinh}" alt="">
			</div>
			<div class="item_search_thongtin">
				<a href="?page=sanpham&id=${value.id}">${value.ten}</a>
				<span>${value.giakm}đ</span> <span><del>${value.giagoc}đ</del></span>
			</div>
		</div>
        `;
        box_show.innerHTML += show_item;
    })
}

function themspall(id_gh,id_sp){
    const sl = document.getElementById('slallsp').value;
    let slint = parseInt(sl);
    if(slint < 0){
        slint = 0;
    }
    addcart(id_gh,id_sp,slint);
}