import axios from 'axios'
import { assert, expect, test } from 'vitest'
import { endpoints } from '@tests/mocks/ws/cnpjWs'
import { Empresa, fetchCnpj } from '@/scripts/ws/cnpjWs'

test('response cnpj.ws to Company', async () => {
    const response = await axios.get(`${endpoints.cnpj}/37045780000104`)

    const empresa = new Empresa(response.data)
    const company = empresa.getCompany()

    expect(empresa.estabelecimento.cnpj).toBe('37045780000104')
    expect(company.cnpj).toBe(empresa.estabelecimento.cnpj)
    expect(company.corporate_name).toBe(empresa.razao_social)
    expect(company.fantasy_name).toBe(empresa.estabelecimento.nome_fantasia)
    expect(company.cpf).toBe(undefined)
    expect(company.foundation_date.format('YYYY-MM-DD')).toBe(empresa.estabelecimento.data_inicio_atividade)

})

test('request cnpj.ws', async () => {
    const company = await fetchCnpj('37045780000104')

    if (company.cnpj) {
        expect(company.cnpj).toBe('37045780000104')
    }
})
