<template>
  <div class="block">
    <span class="block text-sm font-medium text-slate-700">
      <el-tooltip placement="top" v-model:visible="showHelp">
        <template #content>
          <div class="grid place-items-center">
            <div>Informe o CNPJ</div>
            <div>
              <el-button type="text" @click="showHelp = false"
                ><ep-circle-check
              /></el-button>
            </div>
          </div>
        </template>
        <div class="align-bottom">
          CNPJ
          <span class="text-red-500 self-end" v-if="required">*</span>&nbsp;
          <el-icon class="self-end" @click="showHelp = true"><ep-question-filled /></el-icon>
        </div>
      </el-tooltip>
    </span>
    <el-input
      v-model="cnpj"
      @input="changeInput"
      @blur="changeInput"
      ref="input"
      :disabled="disabled"
      v-maska="'##.###.###/####-##'"
    />
    <p class="mt-2 text-rose-500 text-sm">
      {{ message }}
    </p>
  </div>
</template>

<script lang="ts" setup>
import Schema from "async-validator";
import { handleError, reactive, ref } from "@vue/runtime-core";
import { ruleCnpj, ruleRequired } from "@/scripts/util/rules";
import { Company } from "@/models/register/company";
import { Address } from "@/models/register/address";
import { fetchCnpj } from "@/scripts/ws/cnpjWs";
import { watch } from "vue";

interface Props {
  required?: boolean;
  modelValue: any;
  address?:Address
  label?: string;
  rules?: Array<any>;
  disabled?: boolean;
  help?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
  tooltip: "Nenhuma observação",
  help: false,
});

const emit = defineEmits(["update:modelValue", "change", "update:address"]);

const input = ref();

const message = ref("");

let cnpj = ref("");

if (props.modelValue instanceof Company && props.modelValue.cnpj) {
  cnpj.value = props.modelValue.cnpj;
}

let defaultRules = [];

if (props.rules) {
  defaultRules = props.rules;
} else {
  defaultRules.push(ruleCnpj());
}

if (props.required) {
  defaultRules.unshift(ruleRequired("CNPJ"));
}

const validator = new Schema({
  input: defaultRules,
});

// validate after change
const changeInput = _.debounce(function () {
  // cnpj withou mask
  const cnpjUnmasked = input.value.input.dataset.maskRawValue;
  validator.validate({ input: cnpjUnmasked }, (errors: any, fields: any) => {
    if (errors) {
      message.value = errors[0].message;
      return handleError(errors, fields, errors);
    }

    // validation ok
    message.value = "";
    changeModelValue(cnpjUnmasked);
  });
}, 300);

// change props.modelValue, call only after validation if exists
async function changeModelValue(cnpj: string) {
  if (props.modelValue instanceof Company) {
    const company = await fetchCnpj(cnpj);
    emit("update:modelValue", company);
    emit("update:address", company.address);
  } else {
    emit("update:modelValue", cnpj);
  }
}

const showHelp = ref(props.help || false);

watch(showHelp, (value) => {
    showHelp.value = value
});

</script>
