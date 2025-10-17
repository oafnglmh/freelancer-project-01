function singup(e) {
    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    event.preventDefault();

    var name = document.getElementById("ten").value;
    var ho = document.getElementById("ho").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var pass = document.getElementById("pass1").value;
    if (ho !== '') {
        if (email !== '') {
            if (vnf_regex.test(phone) == true) {
                if (name !== '') {
                    if (pass !== '') {
                        var user = {
                            email: email,
                            pass: pass
                        };
                
                        var json = JSON.stringify(user);
                        localStorage.setItem(email, json);
                        alert("Đăng Kí Thành Công")
                        console.log(user)

                    } else {
                        alert("Vui lòng nhập đầy đủ thông tin!");
                    }
                } else {
                    alert("Vui lòng nhập đầy đủ thông tin!");
                }
            } else {
                alert("Vui lòng nhập đúng số điện thoại!");
            }
        } else {
            alert("Vui lòng nhập đầy đủ thông tin!");
        }
    } else {
        alert("Vui lòng nhập đầy đủ thông tin!");

    }

    // if (ho === '' || email === '' || phone === '' || name === ''|| pass === '') {
    //     alert("Vui lòng nhập đầy đủ thông tin!");


    // }
    
// else {
        // var user = {
        //     email: email,
        //     pass: pass
        // };

        // var json = JSON.stringify(user);
        // localStorage.setItem(email, json);
        // alert("Đăng Kí Thành Công")
        // console.log(user)

//     }
}
function login(e) {
    event.preventDefault();
    var email = document.getElementById("hi").value;
    var pass = document.getElementById("pass").value;
    const user = localStorage.getItem(email);
    const data = JSON.parse(user);

    // if (user == null) {
    //     alert("Tài Khoản Không Tồn Tại!");
    // }
    if (email == '' || pass == '') {
        alert("Vui lòng nhập đầy đủ thông tin!");
    }

    else if(email !== data.email || pass !== data.pass){
        alert("Mật Khẩu Hoặc Email Bị Sai!");

    }
   
    else if (email == data.email && pass == data.pass) {

        alert(" Đăng Nhập Thành Công!");
        window.location.href = "accout.html";

    }
   
   

}