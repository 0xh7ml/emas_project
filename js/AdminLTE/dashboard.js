const createParcelForm = document.getElementById('create-parcel');
const invoice_id = document.getElementById('invoiceId');  // get the value
const courier_name = document.getElementById('courier_name');  // get the value
const csrfToken = document.querySelector('input[name="csrfmiddlewaretoken"]').value;
const tBody = document.getElementById('parcel_data');
const path = '/api/create/parcel/'

if (createParcelForm){
    createParcelForm.addEventListener('submit', (e)=>{
        e.preventDefault();
        const payload = JSON.stringify({
            "id" : invoice_id.value,
            "courier_id" : courier_name.value
        });
        create_parcel(payload);
        createParcelAlert(invoice_id.value);
    });
}

async function create_parcel(data){
    try{
        const response = await axios.post(path, data, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRFToken' : csrfToken
            }
        })
        verifyData(response);
    }
    catch(err){
        // console.log(response.data);
        parcelInvalid(); // log error
    }
}


function verifyData(d){
    const parcel_data = d.data[0]; // locating the first data from the array
    if(parcel_data === 'undefined'){
        parcelInvalid();
    }
    else{
        addData(parcel_data); // passing data to template
    }


    // clear input value
    resetOrderId();
}

function addData(e){
    let rowData = `
    <tr>
        <td>parcel</td>
        <td style="white-space: nowrap;">One Ummah Bd - Head Office</td>
        <td>${e.merchant_order_id}</td>
        <td>${e.recipient_name}</td>
        <td>${e.recipient_phone}</td>
        <td>${e.recipient_city}</td>
        <td>${e.recipient_zone}</td>
        <td></td>
        <td>${e.recipient_address}</td>
        <td>${e.amount_to_collect}</td>
        <td>${e.item_quantity}</td>
        <td>0.5</td>
        <td></td>
        <td></td>
    </tr>
    `;

    tBody.innerHTML += rowData;
    createParcelAlert();
}


// reset the barcode input field after scan
function resetOrderId(){
    invoice_id.value = "";
}



function createParcelAlert(){
    Swal.fire({
    title:  'Parcel inserted',
    icon: 'success',
    toast: true,
    width: '400px',
    customClass: {
    popup: 'custom-swal', 
    } ,// Apply the custom text color class to the dialog content  
    background: '#28a745',
    position: 'top-end',
    timer: 2000,
    timerProgressBar: true,
    showConfirmButton: false
    });
}
function parcelInvalid(){
    Swal.fire({
    title:  'Duplicate Entry or Wrong info! Please check again!',
    icon: 'warning',
    toast: true,
    width: '400px',
    customClass: {
    popup: 'custom-swal', 
    } ,// Apply the custom text color class to the dialog content  
    background: '#dc3545',
    position: 'top-end',
    timer: 2000,
    timerProgressBar: true,
    showConfirmButton: false
    });
}

// exporting data 
let date = new Date();
let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();

// This arrangement can be altered based on how we want the date's format to appear.
let currentDate = `${day}-${month}-${year}`;

const btnExport = document.getElementById('export_csv');
const parcelCsv = document.getElementById('parcel_csv')

if(btnExport){
    btnExport.addEventListener('click', ()=>{
        const table2excel = new Table2Excel();
        table2excel.export(parcelCsv, currentDate);
    })
}


// new orders 
const orderReceiveForm = document.getElementById('order_receive');

if(orderReceiveForm){
    orderReceiveForm.addEventListener('submit', (formElement)=>{
        formElement.preventDefault();
        const ordersArray = [] // blank array 

        const orders = document.querySelectorAll('input[name="orderId"]'); // get order id

        orders.forEach(order => {
            ordersArray.push(order.value); // push each order 
        });


        payload = JSON.stringify({
            "data" : ordersArray
        }); // orders array 


        receive_all_order(payload); // pass the data to axios
    })
}


async function receive_all_order(data){
    try{
        const response = await axios.post('/api/receive/order/',data,
            {
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRFToken' : csrfToken
                }
            }
        );
        
        if(response.status === 200){
            // fire sweet alert after reload
            Swal.fire({
                title: 'Order Updated',
                icon: 'success',
                toast: true,
                customClass: {
                popup: 'custom-swal', 
                } ,// Apply the custom text color class to the dialog content  
                background: '#28a745',
                position: 'top-end',
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then(()=>{
                location.reload()
            })
        }
    }
    catch(err){
        console.log(err);
    }
}