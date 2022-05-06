import axios from 'axios'
import { assert, expect, test } from 'vitest'

// Edit an assertion and save to see HMR in action

test('Math.sqrt()', () => {
  expect(Math.sqrt(4)).toBe(2)
  expect(Math.sqrt(144)).toBe(12)
  expect(Math.sqrt(2)).toBe(Math.SQRT2)
})

test('JSON', () => {
  const input = {
    foo: 'hello',
    bar: 'world',
  }

  const output = JSON.stringify(input)

  expect(output).eq('{"foo":"hello","bar":"world"}')
  assert.deepEqual(JSON.parse(output), input, 'matches original')
})

test('Request test', async () => {
    const response = await axios.get('/wsCnpj/cnpj/37045780000104')
    //expect(response.data.cnpj_raiz).toBe('admne')
    expect(import.meta).toBe('admiFn')
})
