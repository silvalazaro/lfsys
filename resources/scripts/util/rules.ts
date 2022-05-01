/**
 * A module withe rules of async validate
 */

import { maskCep } from "./mask"

export function ruleRequired(name: string) {
    return {
        required: true, message: `${name} é obrigatório`
    }
}

export function ruleCep(name?: string) {
    return {
        validator(rule: any, value: any, callback: any) {
            if (value && maskCep(value).length === 9) {
                callback()
            } else if(!value){
                callback()
            }else{
                callback(new Error('CEP inválido'))
            }
        }
    }
}

/**
 * Validate a Brazil CNPJ.
 *
 * @function
 * @param {string} name - Name of field
 */
export function ruleCnpj(name?: string) {
    return {
        validator(rule: any, value: any, callback: any) {

            const cnpj = value.replace(/[^\d]+/g,'');

            if(cnpj == '' || cnpj.length != 14){
                callback(new Error('CNPJ inválido'))
                return
            }

            if (cnpj == "00000000000000" ||
                cnpj == "11111111111111" ||
                cnpj == "22222222222222" ||
                cnpj == "33333333333333" ||
                cnpj == "44444444444444" ||
                cnpj == "55555555555555" ||
                cnpj == "66666666666666" ||
                cnpj == "77777777777777" ||
                cnpj == "88888888888888" ||
                cnpj == "99999999999999"){
                    callback(new Error('CNPJ inválido'))
                    return
                }

            // Valida DVs
            let tamanho = cnpj.length - 2
            let numeros = cnpj.substring(0,tamanho);
            const digitos = cnpj.substring(tamanho);
            let soma = 0;
            let pos = tamanho - 7;
            for (let i = tamanho; i >= 1; i--) {
              soma += numeros.charAt(tamanho - i) * pos--;
              if (pos < 2)
                    pos = 9;
            }
            let resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0)){
                callback(new Error('CNPJ inválido'))
                return
            }

            tamanho = tamanho + 1;
            numeros = cnpj.substring(0,tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (let i = tamanho; i >= 1; i--) {
              soma += numeros.charAt(tamanho - i) * pos--;
              if (pos < 2)
                    pos = 9;
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(1)){
                callback(new Error('CNPJ inválido'))
                return
            }
            callback()
            return;
        }
    }
}
