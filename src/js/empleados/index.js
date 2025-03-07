import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import { validarFormulario, Toast, confirmacion} from "../funciones";

const formulario = document.querySelector('form')
const tablaEmpleados = document.getElementById('tablaEmpleados');
const btnBuscar = document.getElementById('btnBuscar');
const btnModificar = document.getElementById('btnModificar');
const btnGuardar = document.getElementById('btnGuardar');
const btnCancelar = document.getElementById('btnCancelar');
const divTabla = document.getElementById('divTabla');

btnModificar.disabled = true
btnModificar.parentElement.style.display = 'none'
btnCancelar.disabled = true
btnCancelar.parentElement.style.display = 'none'

const guardar = async (evento) => {
    evento.preventDefault();
    if(!validarFormulario(formulario, ['emp_cod'])){
        Toast.fire({
            icon: 'info',
            text: 'Debe llenar todos los datos'
        })
        return 
    }

    const body = new FormData(formulario)
    body.delete('emp_cod')
    const url = '/final_is2_ramos/API/empleados/guardar';
    const config = {
        method : 'POST',
        // body: otroNombre
        body
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();

        // console.log(data);
        //  return
        
        const {codigo, mensaje,detalle} = data;
        let icon = 'info'
        switch (codigo) {
            case 1:
                formulario.reset();
                icon = 'success'
                buscar();
                break;
        
            case 0:
                icon = 'error'
                console.log(detalle)
                break;
        
            default:
                break;
        }

        Toast.fire({
            icon,
            text: mensaje
        })

    } catch (error) {
        console.log(error);
    }
}

const buscar = async () => {

    let emp_nom = formulario.emp_nom.value;
    let emp_dpi = formulario.emp_dpi.value;
    let emp_puesto_cod = formulario.emp_puesto_cod.value;
    let emp_edad = formulario.emp_edad.value;
    let emp_sex_cod = formulario.emp_sex_cod.value;
    let emp_area_cod = formulario.emp_area_cod.value;
    const url = `/final_is2_ramos/API/empleados/buscar?emp_nom=${emp_nom}&emp_dpi=${emp_dpi}&emp_puesto_cod=${emp_puesto_cod}&emp_edad=${emp_edad}&emp_sex_cod=${emp_sex_cod}&emp_area_cod=${emp_area_cod}`;
    const config = {
        method : 'GET'
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();
        
        tablaEmpleados.tBodies[0].innerHTML = ''
        const fragment = document.createDocumentFragment();
        console.log(data);
        // return;
        if(data.length > 0){
            let contador = 1;
            data.forEach( empleado => {
                // CREAMOS ELEMENTOS
                const tr = document.createElement('tr');
                const td1 = document.createElement('td')
                const td2 = document.createElement('td')
                const td3 = document.createElement('td')
                const td4 = document.createElement('td')
                const td5 = document.createElement('td')
                const td6 = document.createElement('td')
                const td7 = document.createElement('td')
                const td8 = document.createElement('td')
                const td9 = document.createElement('td')
                const buttonModificar = document.createElement('button')
                const buttonEliminar = document.createElement('button')

                // CARACTERISTICAS A LOS ELEMENTOS
                buttonModificar.classList.add('btn', 'btn-warning')
                buttonEliminar.classList.add('btn', 'btn-danger')
                buttonModificar.textContent = 'Modificar'
                buttonEliminar.textContent = 'Eliminar'

                buttonModificar.addEventListener('click', () => colocarDatos(empleado))
                buttonEliminar.addEventListener('click', () => eliminar(empleado.emp_cod))

                td1.innerText = contador;
                td2.innerText = empleado.emp_nom
                td3.innerText = empleado.emp_dpi
                td4.innerText = empleado.pue_descr
                td5.innerText = empleado.emp_edad
                td6.innerText = empleado.sex_descr
                td7.innerText = empleado.area_nom
                
                
                // ESTRUCTURANDO DOM
                td8.appendChild(buttonModificar)
                td9.appendChild(buttonEliminar)
                tr.appendChild(td1)
                tr.appendChild(td2)
                tr.appendChild(td3)
                tr.appendChild(td4)
                tr.appendChild(td5)
                tr.appendChild(td6)
                tr.appendChild(td7)
                tr.appendChild(td8)
                tr.appendChild(td9)

                fragment.appendChild(tr);

                contador++;
            })
        }else{
            const tr = document.createElement('tr');
            const td = document.createElement('td')
            td.innerText = 'No existen registros'
            td.colSpan = 9
            tr.appendChild(td)
            fragment.appendChild(tr);
        }

        tablaEmpleados.tBodies[0].appendChild(fragment)
    } catch (error) {
        console.log(error);
    }
}

const colocarDatos = (datos) => {
    formulario.emp_nom.value = datos.emp_nom;
    formulario.emp_dpi.value = datos.emp_dpi;
    formulario.emp_puesto_cod.value = datos.emp_puesto_cod;
    formulario.emp_edad.value = datos.emp_edad;
    formulario.emp_sex_cod.value = datos.emp_sex_cod;
    formulario.emp_area_cod.value = datos.emp_area_cod;
    formulario.emp_cod.value = datos.emp_cod;

    btnGuardar.disabled = true
    btnGuardar.parentElement.style.display = 'none'
    btnBuscar.disabled = true
    btnBuscar.parentElement.style.display = 'none'
    btnModificar.disabled = false
    btnModificar.parentElement.style.display = ''
    btnCancelar.disabled = false
    btnCancelar.parentElement.style.display = ''
    divTabla.style.display = 'none'

    // modalEjemploBS.show();
}

const cancelarAccion = () => {
    btnGuardar.disabled = false
    btnGuardar.parentElement.style.display = ''
    btnBuscar.disabled = false
    btnBuscar.parentElement.style.display = ''
    btnModificar.disabled = true
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.disabled = true
    btnCancelar.parentElement.style.display = 'none'
    divTabla.style.display = ''
}

const modificar = async () => {
    if(!validarFormulario(formulario)){
        alert('Debe llenar todos los campos');
        return 
    }

    const body = new FormData(formulario)
    const url = '/final_is2_ramos/API/empleados/modificar';
    const config = {
        method : 'POST',
        body
    }

    try {
        // fetch(url, config).then( (respuesta) => respuesta.json() ).then(d => data = d)
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();
        
        const {codigo, mensaje,detalle} = data;
        let icon = 'info'
        switch (codigo) {
            case 1:
                formulario.reset();
                icon = 'success'
                buscar();
                cancelarAccion();
                break;
        
            case 0:
                icon = 'error'
                console.log(detalle)
                break;
        
            default:
                break;
        }

        Toast.fire({
            icon,
            text: mensaje
        })

    } catch (error) {
        console.log(error);
    }
}

const eliminar = async (id) => {
    if(await confirmacion('warning','¿Desea eliminar este registro?')){
        const body = new FormData()
        body.append('emp_cod', id)
        const url = '/final_is2_ramos/API/empleados/eliminar';
        const config = {
            method : 'POST',
            body
        }
        try {
            const respuesta = await fetch(url, config)
            const data = await respuesta.json();
            console.log(data)
            const {codigo, mensaje,detalle} = data;
    
            let icon = 'info'
            switch (codigo) {
                case 1:
                    icon = 'success'
                    buscar();
                    break;
            
                case 0:
                    icon = 'error'
                    console.log(detalle)
                    break;
            
                default:
                    break;
            }
    
            Toast.fire({
                icon,
                text: mensaje
            })
    
        } catch (error) {
            console.log(error);
        }
    }
}
buscar();
formulario.addEventListener('submit', guardar )
btnBuscar.addEventListener('click', buscar)
btnCancelar.addEventListener('click', cancelarAccion)
btnModificar.addEventListener('click', modificar)
