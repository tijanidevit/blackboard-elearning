@props(['colspan' => '1', 'message' => 'Record is empty'])

<tr>
    <td colspan="{{$colspan}}" class="text-center">
        {{ $message }}
    </td>
</tr>
