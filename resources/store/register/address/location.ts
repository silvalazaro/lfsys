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
    uf: string | number,
    street: string,
    district: string,
    country: string
}

const location:Local = reactive({
    cep: "01001-000",
    street: "",
    complemento: "",
    district: "",
    city: "",
    country: "",
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
    location.street = viacep.logradouro
    location.district = viacep.bairro
}
