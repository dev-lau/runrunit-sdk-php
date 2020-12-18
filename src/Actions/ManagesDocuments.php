<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\Document;

trait ManagesDocuments
{
    /**
     * Get all task documents.
     *
     * @param int $id Task id
     *
     * @return array
     */
    public function documents($id)
    {
        return $this->transformCollection(
            $this->get("tasks/{$id}/documents"),
            Document::class
        );
    }

    /**
     * Find document by id.
     *
     * @param int $id
     *
     * @return Document
     */
    public function document($id)
    {
        $document = $this->get("documents/{$id}");

        return new Document($document, $this);
    }

    /**
     * Downloads a document.
     *
     * @param int  $id  Document ID
     * @param bool  $rawResponse  Get the response as \Psr\Http\Message\ResponseInterface or the body string
     *
     * @return mixed
     */
    public function downloadDocument($id, $rawResponse = true)
    {
        return $this->get("documents/{$id}/download", compact('rawResponse'));
    }
}
