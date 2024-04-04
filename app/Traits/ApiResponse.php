<?php
namespace App\Traits;

trait ApiResponse
{

    /**
     * Creates a success response.
     *
     * @param mixed $data Optional data to include in the response.
     * @param string $message The success message to include in the response. Defaults to "Success".
     * @param int $statusCode The HTTP status code to return. Defaults to 200.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response object.
     */
    protected function successResponse($data = null, $message = "Success", $statusCode = 200)
    {
        return $this->jsonResponse(true, $statusCode, $message, $data);
    }

    /**
     * Creates an error response.
     *
     * @param string $message The error message to include in the response. Defaults to "Error".
     * @param int $statusCode The HTTP status code to return. Defaults to 500.
     * @param mixed $data Optional data to include in the response.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response object.
     */
    protected function errorResponse($message = "Error", $statusCode = 500, $data = null)
    {
        return $this->jsonResponse(false, $statusCode, $message, $data);
    }

    /**
     * Private method to create a JSON response.
     *
     * @param bool $success Whether the operation was successful.
     * @param int $statusCode The HTTP status code to return.
     * @param string $message The message to include in the response.
     * @param mixed $data Optional data to include in the response.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response object.
     */
    private function jsonResponse($success, $statusCode, $message, $data = null)
    {
        $response = [
            'success' => $success,
            'status_code' => $statusCode,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $statusCode);
    }
}
