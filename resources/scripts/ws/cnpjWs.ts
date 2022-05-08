import _ from 'lodash'
import moment from 'moment'

import { Address } from "@/models/register/address";
import { Company, RegistrationStatus } from "@/models/register/company";
import { Activity } from "@/models/register/company/activity";
import axios from 'axios';

interface InscricaoEstadualInterface {
    inscricao_estadual: string
    ativo: boolean
    estado: EstadoInterface
}

interface EstadoInterface {
    sigla: string
}

interface CidadeInterface {
    nome: string
}

interface AtividadeInterface {
    id: string
    descricao: string
}


export class Empresa {
    razao_social = "";
    responsavel_federativo = "";
    estabelecimento = {
        cnpj: '',
        nome_fantasia: '',
        situacao_cadastral: '',
        data_inicio_atividade: '',
        tipo_logradouro: '',
        numero: "",
        complemento: "",
        bairro: "",
        cep: "",
        ddd1: "",
        telefone1: "",
        ddd2: "",
        telefone2: "",
        ddd_fax: "",
        fax: "",
        email: "",
        situacao_especial: "",
        data_situacao_especial: "",
        atividade_principal: {
            id: "",
            descricao: ""
        },
        atividades_secundarias:[]
    };

    constructor(args:any) {
        _.merge(this, args)
    }

    getCompany(): Company {
        const company = new Company()
        company.cnpj = this.estabelecimento.cnpj
        company.corporate_name = this.razao_social
        company.fantasy_name = this.estabelecimento.nome_fantasia
        company.situation = this.getSituacaoCadastral()
        company.foundation_date = moment(this.estabelecimento.data_inicio_atividade, 'YYYY-MM-DD')
        // address
        const address = new Address()
        address.street_type = this.estabelecimento.tipo_logradouro;


        // fill activities
        this.getAtividadesSecundarias().forEach(e => {
            company.secondary_activities.push(new Activity({
                name: e.descricao,
                code: e.id
            }))
        })

        return company
    }

    getSituacaoCadastral():RegistrationStatus {
        switch (this.estabelecimento.situacao_cadastral) {
            case 'Ativa': return RegistrationStatus.ACTVE
        }
        return RegistrationStatus.VOID
    }

    getAtividade():AtividadeInterface{
        return this.estabelecimento.atividade_principal
    }

    getAtividadesSecundarias():Array<AtividadeInterface>{
        return this.estabelecimento.atividades_secundarias
    }

}

export async function fetchCnpj(cnpj: string): Promise<Company>{
    try {
        const response = await axios.get(`https://publica.cnpj.ws/cnpj/${cnpj}`)
        const empresa = new Empresa(response.data);
        return empresa.getCompany()
    } catch (error) {

    }
    return new Company({cnpj})
}
