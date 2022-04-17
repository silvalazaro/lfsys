import { reactive } from "vue";

interface viacep {
    cep: string
    logradouro: string
    complemento: string
    bairro: string
    localidade: string
    uf: string
}
interface Local{
    cep: string,
    city: string | number,
    uf: string | number
}

const location:Local = reactive({
    cep: "01001-000",
    logradouro: "",
    complemento: "",
    bairro: "",
    city: "",
    uf: "",
    ibge: "",
    gia: "",
    ddd: "",
    siafi: ""
})

export  {location}

export function setLocation(viacep: viacep) {
    location.cep = viacep.cep
    location.city = viacep.localidade
    location.uf = viacep.uf
}
