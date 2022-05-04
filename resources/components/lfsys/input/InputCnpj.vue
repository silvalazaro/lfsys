<template>
  <div>
    <label class="block">
      <span class="block text-sm font-medium text-slate-700">
        <el-tooltip :content="tooltip" placement="top-start">
          <div>CNPJ <span class="text-red-500" v-if="required">*</span></div>
        </el-tooltip>
      </span>
      <el-input
        v-model="value"
        @input="changeInput"
        @blur="changeInput"
        ref="input"
        :disabled="disabled"
        v-maska="'##.###.###/####-##'"
      />
      <p class="mt-2 text-rose-500 text-sm">
        {{ message }}
      </p>
    </label>
  </div>
</template>

<script lang="ts" setup>
import Schema from "async-validator";
import { computed, handleError, ref } from "@vue/runtime-core";
import { ruleCnpj, ruleRequired } from "@/scripts/util/rules";
import { Company } from "@/models/register/company";
import { Address } from "@/models/register/address";

interface Props {
  required?: boolean;
  modelValue: string | Company;
  label?: string;
  rules?: Array<any>;
  disabled?: boolean;
  tooltip?: string;
}



const props = withDefaults(defineProps<Props>(), {
  tooltip: "Nenhuma observação",
});

const emit = defineEmits(["update:modelValue", "change"]);

const input = ref();

const message = ref("");

let company = new Company()

const tempValue = ref("");

const value = computed<Company | string>({
  get():Company | string {
    return  props.modelValue instanceof Company ? company : company.cnpj
  },
  set: (value: string | Company) => {
    if(value instanceof Company){
        company = value
    }else{
        company.cnpj = value
    }
  },
});

let defaultRules = [];

if (props.rules) {
  defaultRules = props.rules
}else{
 defaultRules.push(ruleCnpj())
}

if (props.required) {
  defaultRules.unshift(ruleRequired("CNPJ"));
}

const validator = new Schema({
  input: defaultRules,
});

// validate after change
const changeInput = _.debounce(function () {
   // pego cnpj
  company.cnpj =  input.value.input.dataset.maskRawValue;
  if (validator) {
    const newValue = input.value.input.dataset.maskRawValue;
    validator.validate({ input: newValue }, (errors: any, fields: any) => {
      if (errors) {
        message.value = errors[0].message;
        return handleError(errors, fields, errors);
      }

     // is valid
  try {
    // O Token é opcional

  } catch (e) {
  }

      emit("update:modelValue", value);
      message.value = "";
    });
  } else {
    emit("update:modelValue", value);
  }
}, 300);



</script>
