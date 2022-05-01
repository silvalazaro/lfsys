import { Address } from "@/models/register/address";
import { Company, RegistrationStatus } from "@/models/register/company";
import { Activity } from "@/models/register/company/activity";
const consultarCNPJ = require('consultar-cnpj')

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


class Empresa {
    razao_social = "";
    responsavel_federativo = "";
    estabelecimento = {
        nome_fantasia: '',
        situacao_cadastral: '',
        data_inicio_atividade: '',
        tipo_logradouro: '',
        nome_fantasia: "",
        situacao_cadastral: "",
        data_situacao_cadastral: "",
        data_inicio_atividade: "",
        nome_cidade_exterior: "",
        tipo_logradouro: "",
        logradouro: "",
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

    constructor() {
    }

    getCompany(): Company {
        const company = new Company()
        company.corporate_name = this.razao_social
        company.fantasy_name = this.estabelecimento.nome_fantasia
        company.situation = this.getSituacaoCadastral()
        company.opening_date = this.estabelecimento.data_inicio_atividade
        // address
        const address = new Address()
        address.street_type = this.estabelecimento.tipo_logradouro;
        address.street = this.estabelecimento.logradouro


        // fill activities
        this.getAtividadesSecundarias().forEach(e => {
            company.secondary_activities.push(new Activity({
                name: e.descricao,
                code: e.id
            }))
        })

        return company
    }

    getSituacaoCadastral() {
        switch (this.estabelecimento.situacao_cadastral) {
            case 'Ativa': return RegistrationStatus.ACTVE
        }
    }

    getAtividade():AtividadeInterface{
        return this.estabelecimento.atividade_principal
    }

    getAtividadesSecundarias():Array<AtividadeInterface>{
        return this.estabelecimento.atividades_secundarias
    }

}

export class fetchCnpj(cnpj: string): Company{
    const empresa: Empresa = await consultarCNPJ(cnpj);

    return empresa.getCompany()
}
