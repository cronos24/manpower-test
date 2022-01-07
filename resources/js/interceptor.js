import axios from 'axios';


axios.interceptors.response.use(function(response) {
    // Any status code that lie within the range of 2xx cause this function to trigger
    // Do something with response data
    return response;
}, function(error) {

    console.log("session expired",error);
    // Any status codes that falls outside the range of 2xx cause this function to trigger
    // Do something with response error
    switch (error.response.status) {
        case 401:
            console.log("session expired");
            localStorage.login = 0;
            alert('Acceso Denegado');
            window.location.href = "/Login";
            //location.reload();
            break;
        case 403:
            localStorage.login = 0;
            alert('Acceso Denegado');
            window.location.href = "/Login";
            break;
       
            

    }

    console.log('errors:', error);

    // if (error.response.status === 403 || error.response.status === 401) {
    //     // router.app.$swal('Sesión inactiva !!!', '', 'warning');
    //     // router.push({ path: '/Login' });
    //     //window.location.href = "/Login";



    // }
    return Promise.reject(error);
});

axios.interceptors.request.use(request => {
    // add auth header with jwt if account is logged in and request is to the api url    

    if (localStorage.login==1 && localStorage.token) {
        request.headers.common.Authorization = `Bearer ${localStorage.token}`;
    }

    return request;
});