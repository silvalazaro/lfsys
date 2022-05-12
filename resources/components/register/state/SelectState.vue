<template>
  <sys-select
    v-model="value"
    v-model:array="valueArray"
    label="Estado"
    :url="route('ufs.select')"
    class="w-1/6"
    message="Estado"
  />
</template>

<script lang="ts" setup>
import { SysSelectInterface } from "@/components/lfsys/select";
import { State } from "@/models/register/state";
import { computed, reactive } from "@vue/runtime-core";

interface PropsInterface<T>{
  modelValue?: T
  array?: Array<T>
}

const emit = defineEmits(["update:modelValue", "update:array"]);

const props = defineProps<PropsInterface<State>>()

const value = computed({
    get():SysSelectInterface | undefined{
        return props.modelValue
    },
    set(value:SysSelectInterface | undefined){
        emit("update:modelValue", new State(value))
    }
})

const valueArray = computed({
     get():Array<SysSelectInterface> | undefined{
        return props.array
    },
    set(value:Array<SysSelectInterface> | undefined){
        emit("update:array", value)
    }
})


</script>
