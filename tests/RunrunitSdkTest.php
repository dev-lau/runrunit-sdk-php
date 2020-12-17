<?php

use PHPUnit\Framework\TestCase;
use Devlau\Runrunit\Runrunit;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class RunrunitTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function test_making_basic_requests()
    {
        $runrunit = new Runrunit('', '123', $http = Mockery::mock(Client::class));

        $http->shouldReceive('request')->once()->with('GET', 'boards', [])->andReturn(
            $response = Mockery::mock(Response::class)
        );

        $response->shouldReceive('getStatusCode')->once()->andReturn(200);
        $response->shouldReceive('getBody')->once()->andReturn('{"data": [{"key": "value"}]}');

        $boards = $runrunit->boards();

        $this->assertContainsOnlyInstancesOf(\Devlau\Runrunit\Resources\Board::class, $boards);
    }

    public function test_handling_validation_errors()
    {
        $runrunit = new Runrunit('', '123', $http = Mockery::mock(Client::class));

        $http->shouldReceive('request')->once()->with('GET', 'boards', [])->andReturn(
            $response = Mockery::mock(Response::class)
        );

        $response->shouldReceive('getStatusCode')->andReturn(422);
        $response->shouldReceive('getBody')->once()->andReturn('{"errors": {"name": ["The name is required."]}}');

        try {
            $runrunit->boards();
        } catch (\Devlau\Runrunit\Exceptions\ValidationException $e) {
        }

        $this->assertEquals(['name' => ['The name is required.']], $e->errors());
    }

    public function test_handling_404_errors()
    {
        $this->expectException(\Devlau\Runrunit\Exceptions\NotFoundException::class);

        $runrunit = new Runrunit('', '123', $http = Mockery::mock(Client::class));

        $http->shouldReceive('request')->once()->with('GET', 'boards', [])->andReturn(
            $response = Mockery::mock(Response::class)
        );

        $response->shouldReceive('getStatusCode')->andReturn(404);

        $runrunit->boards();
    }

    public function test_handling_failed_action_errors()
    {
        $runrunit = new Runrunit('', '123', $http = Mockery::mock(Client::class));

        $http->shouldReceive('request')->once()->with('GET', 'boards', [])->andReturn(
            $response = Mockery::mock(Response::class)
        );

        $response->shouldReceive('getStatusCode')->andReturn(400);
        $response->shouldReceive('getBody')->once()->andReturn('Error!');

        try {
            $runrunit->boards();
        } catch (\Devlau\Runrunit\Exceptions\FailedActionException $e) {
        }

        $this->assertEquals('Error!', $e->getMessage());
    }
}
