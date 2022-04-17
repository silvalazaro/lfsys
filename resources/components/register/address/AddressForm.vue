<template>
  <el-row>
    <el-col :span="12">
      <input-cep />
      <el-form label-width="120px" :model="address" :rules="rules" ref="form">
        <el-form-item label="Logradouro" prop="place">
          <el-input v-model="address.place" />
        </el-form-item>
        <el-form-item label="Número">
          <el-input v-model="address.number" prop="number" />
        </el-form-item>
      </el-form>
    </el-col>
    <el-col :span="12">
        <location />
    </el-col>
  </el-row>
</template>

<script lang="ts" setup>
import { reactive, ref } from "vue";
import { Address, createRules } from "@/models/register/Address";

const address = reactive(new Address());
const form = ref(null);

const rules = createRules();

const options = [];

const changeCep = _.debounce(function () {
  // axios.get('https://viacep.com.br/ws/01001000/json/')
  // .then((res) => {
  //     console.log(res.data)
  // })
}, 1000);
</script>
