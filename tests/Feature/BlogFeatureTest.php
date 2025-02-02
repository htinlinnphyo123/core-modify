<?php
//SMALL_MODEL , MODEL , PLURAL_MODEL
namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Blogs\Blog;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BlogFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/????";
    const TABLE = "????";

    //UnAuthorized Test
    public function test_prevent_non_logged_users_to_access_blog_routes(): void
    {
        $blog = Blog::first()->toArray();;
        $blogList = $this->get(self::ROUTE);
        $blogCreate = $this->post(self::ROUTE);
        $blogUpdate = $this->put(self::ROUTE . "/" . $blog['id']);
        $blogEdit = $this->get(self::ROUTE . "/" . $blog['id'] . "/edit");
        $blogDelete = $this->delete(self::ROUTE . "/" . $blog['id']);

        $blogList->assertStatus(302);
        $blogCreate->assertStatus(302);
        $blogUpdate->assertStatus(302);
        $blogEdit->assertStatus(302);
        $blogDelete->assertStatus(302);
    }

    //Store Validation Test
    public function test_blog_cannot_store_without_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }


    //Store Process
    public function test_store_process_of_blog(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfBlogBefore = Blog::count();
        $request = $this->prepareData("Test Name");
        $this->post(self::ROUTE, $request);
        $totalNumberOfBlogAfter = Blog::count();
        $this->assertEquals($totalNumberOfBlogBefore + 1, $totalNumberOfBlogAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //Listing Process
    public function test_list_of_blog(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //Update Process
    public function test_update_process_of_blog(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $oldData = Blog::Create($this->prepareData("Test Name"));
        $totalNumberOfBlogBefore = Blog::count();
        $updateData = $this->prepareData("Update Name");
        $this->put(self::ROUTE . "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfBlogAfter = Blog::count();
        $this->assertEquals($totalNumberOfBlogBefore, $totalNumberOfBlogAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));
    }

    //Delete Validation
    public function test_cblog_cannot_delete_without_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deleteData = Blog::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $response->assertStatus(302);
    }

    //Delete Process
    public function test_delete_process_of_blog(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfBlogBefore = Blog::Count();
        $deleteData = Blog::first();
        $request = $this->prepareDataForDelete($deleteData->id);
        $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $totalNumberOfBlogAfter = Blog::Count();
        $this->assertEquals($totalNumberOfBlogBefore, $totalNumberOfBlogAfter + 1);
    }

    //Private Section
    private function prepareData(string $param1): array
    {
        return [
            "name" => $param1,
        ];
    }

    private function prepareDataForCheck(array $data): array
    {
        return [
            'name' => isset($data['name']) ? $data['name'] : '',
        ];
    }

    private function prepareDataForDelete(string $id): array
    {
        return [
            'id' => $id != '' ? customEncoder($id) : '',
        ];
    }

}
