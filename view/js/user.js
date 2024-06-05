
document.getElementById('form-dangki').addEventListener('submit',function(e){
    e.preventDefault();
    const name = this.querySelector("input[type=text]");
    const email = this.querySelector("input[type=email]");
    const pass = this.querySelector(".mk");
    const cfpass = this.querySelector(".cfmk");
    const thongbao = document.querySelector(".thongtindk p");
    var timetb;
    if(
        name.value == '' ||
        email.value == '' ||
        pass.value == '' ||
        cfpass.value == ''
    ){
        thongbao.innerHTML = 'Vui lòng nhập đầy đủ thông tin!';
        if(timetb){
            clearTimeout(timetb);
        }
         timetb = setTimeout(() => {
        thongbao.innerHTML = '';
        }, 3000);
        return;
    }
    if(pass.value != cfpass.value){
        thongbao.innerHTML = 'Mật khẩu không khớp!';
        if(timetb){
            clearTimeout(timetb);
        }
         timetb = setTimeout(() => {
        thongbao.innerHTML = '';
        }, 3000);
        return;
    }
    const infor_user = {
        name : name.value,
        email : email.value,
        pass : pass.value
    }

    const url = "http://localhost/PHP1_xampp/ASM_PHP1_xampp/model/dangki.php";
    fetch(url,{
        method : 'post',
        body : JSON.stringify(infor_user),
        headers: {"Content-Type" : "application/json"}
    })
        .then((res)=>{return res.json()})
        .then(data=>{
          thongbao.textContent = data['thongbao'];
          if(timetb){
            clearTimeout(timetb);
        }
           timetb = setTimeout(() => {
            thongbao.innerHTML = '';
            }, 3000);
           
            if(typeof data['err'] != 'undefined'){
                 console.error(data['err']);
            }else{
                name.value = '' ;
                email.value = '' ;
                pass.value = '';
                cfpass.value = '';
            }
        })
        .catch(err=>{
            console.log('Lỗi máy chủ');
        })
   
    
});


window.onload = ()=>{
    const thongdn = document.querySelector('.thongbao-dangnhap p');
    setTimeout(()=>{
        thongdn.innerHTML = '';
    },3000);
}

function quenkm(){
	const input = document.getElementById('emaildn').value;
	const thongbao = document.querySelector('.thongbao-dangnhap p');
    const loading = document.querySelector('.loadding');
    
	if(input == ''){
		thongbao.innerHTML = 'Vui lòng nhập Email!';
		setTimeout(()=>{thongbao.innerHTML = ''},3000);
		return;
	}
	loading.style.display = 'grid';
	const url = "http://localhost/PHP1_xampp/ASM_PHP1_xampp/model/quenmk.php";
	fetch(url,{
		method: 'post',
		body: JSON.stringify({email : input}),
		headers: { 'Content-Type': 'application/json' }
	})
		.then(res=>{return res.json()})
		.then(data=>{
            loading.style.display = 'none';
			if(typeof data['one'] != 'undefined'){
				thongbao.innerHTML = data['one'];
				setTimeout(()=>{thongbao.innerHTML = ''},3000);
			}else{
				thongbao.innerHTML = 'Vui lòng kiểm tra console!';
				setTimeout(()=>{thongbao.innerHTML = ''},3000);
				console.log(data);
			}
		})
		.catch(err=>{
            loading.style.display = 'none';
            console.log(err);
        })
}