<template>
  <el-form :model="model" :rules="rules" ref="form">
    <el-form-item label="CEP" prop="cep">
      <el-input
        v-model="model.cep"
        v-maska="'#####-###'"
        @input="changeCep"
        ref="input"
      />
    </el-form-item>
  </el-form>
</template>

<script lang="ts" setup>
import { ruleCep, ruleRequired } from "@/scripts/util/rules";
import { reactive, ref } from "@vue/reactivity";
import axios from "axios";
import { setLocation } from "@/store/register/address/location";

const model = reactive({
  cep: null,
});
const input = ref();
const form = ref();
const rules = {
  cep: [ruleRequired("CEP"), ruleCep()],
};

const changeCep = _.debounce(function (value) {
  form.value.validate((e: boolean) => {
    if (e) {
      const cep = input.value.input.dataset.maskRawValue;
      axios.get(`https://viacep.com.br/ws/${cep}/json/`).then((res) => {
        if (res.data.cep) {
          setLocation(res.data)
        }
      });
    }
  });
}, 800);
</script>
